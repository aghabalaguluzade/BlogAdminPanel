<?php

namespace App\Repositories\Eloquent;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserRepository
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function update(User $user, array $data)
    {
        $user->update($data);
        return $user;
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function findByEmailAndPassword($email, $password)
    {
        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }

        return null;
    }

    public function updateProfile($id, array $data)
    {
        $user = $this->find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        
        if (request()->hasFile('img') && request()->file('img')->isValid()) {
            $image = request()->file('img');
            $directory = config('apidomain.path') .'/settings';
            $img_name = 'profile' . '.' . $image->getClientOriginalExtension();
            if(file_exists($user->img)) {
                unlink($user->img);
            }
            $image->move($directory, $img_name);
            $img_name = $directory.$img_name;
            $user->img = $img_name;
        }

        if(!empty($data['new_password']) && !empty($data['password'])){
            if (!Hash::check($data['password'], $user->password)) {
                return false;
                return redirect()->back()->with('password', 'Daxil etdiyiniz şifrə ilə bağlı hesab yoxdur',true);
            }
            $user->password = bcrypt($data['new_password']);
        }
        
        $user->save();
        return $user;
    }
}