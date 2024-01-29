<?php

namespace App\Livewire\Forms;

use App\Helpers\FeatureHelper;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Form;

class UserForm extends Form
{
    public $first_name;
    public $last_name;
    public $email;
    public $id;
    public $username;
    public $mobile_no;
    public $password;
    public $password_confirmation;
    public $division_id;
    public $role_name;
    public $is_active;

    public function rules()
    {
        $rules = [
            'first_name' => ['required', 'min:2', 'max:100'],
            'last_name' => ['nullable', 'min:2', 'max:100'],
            'email' => ['required', 'email', Rule::unique(User::class)->ignore($this->id)],
            'mobile_no' => ['nullable', 'max:20'],
            'division_id' => ['required'],
            'role_name' => ['required'],
        ];

        if (FeatureHelper::isEnabled(FeatureHelper::LOGIN_WITH_USERNAME)) {
            $rules['username'] = ['nullable', 'min:4', 'max:100'];
        }

        if (!$this->id) {
            $rules['password'] = ['required', 'confirmed', 'min:8', 'max:100'];
            $rules['password_confirmation'] = ['required', 'min:8', 'max:100'];
        }

        return $rules;
    }

    public function save()
    {
        $this->validate();

        $validated = $this->only([
            'first_name',
            'last_name',
            'email',
            'mobile_no',
            'division_id',
            'role_name',
            'is_active',
        ]);

        DB::beginTransaction();
        try {
            if ($this->id) {
                $user = User::findOrFail($this->id);
                $user->is_active = $this->is_active ? true : false;
            } else {
                $user = new User();
                $user->is_active = 1;
                $validated['password'] = $this->password;
                $user->password = Hash::make($validated['password']);
            }

            $user->first_name = $validated['first_name'];
            $user->last_name = $validated['last_name'];
            $user->full_name = $validated['first_name'] . " " . $validated['last_name'];
            $user->email = $validated['email'];
            $user->mobile_no = $validated['mobile_no'];
            if (FeatureHelper::isEnabled(FeatureHelper::LOGIN_WITH_USERNAME)) {
                $validated['username'] = $this->username;
                $user->username = $validated['username'];
            } else {
                $user->username = $validated['first_name'] . $validated['last_name'];
            }
            $user->save();

            $division[] = $validated['division_id'];
            if ($this->id) {
                $user->syncRoles($validated['role_name']);
                $user->divisions()->sync($division);
            } else {
                $user->assignRole($validated['role_name']);
                $user->divisions()->attach($division);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function setUser($user)
    {
        if ($user) {
            $this->id = $user->id;
            $this->first_name = $user->first_name;
            $this->last_name = $user->last_name;
            $this->email = $user->email;
            $this->username = $user->username;
            $this->mobile_no = $user->mobile_no;
            $this->division_id = $user->divisions[0]->id;
            $this->role_name = $user->roles[0]->name;
            $this->is_active = $user->is_active;
        }
    }
}
