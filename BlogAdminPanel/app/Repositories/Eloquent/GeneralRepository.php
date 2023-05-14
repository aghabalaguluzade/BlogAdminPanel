<?php 

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class GeneralRepository
{
    public function all(Model $model)
    {
        return $model->all();
    }

    public function create(Model $model, array $data)
    {
        return $model->create($data);
    }

    public function update(Model $model, array $data, $id)
    {
        $record = $model->findOrFail($id);
        $record->update($data);
        return $record;
    }
}
