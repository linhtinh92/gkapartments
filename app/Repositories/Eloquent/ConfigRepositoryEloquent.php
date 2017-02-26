<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ConfigRepository;
use App\Entities\Config;
use App\Validators\ConfigValidator;

/**
 * Class ConfigRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class ConfigRepositoryEloquent extends BaseRepository implements ConfigRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Config::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return ConfigValidator::class;
    }

    public function getAllConfig(){
        $result = [];
        $settings = $this->all();
        if ($settings) {
            foreach ($settings as $key => $row) {
                $result[$row->option_key] = $row->option_value;
            }
        }
        return $result;
    }

    public function updateSettings($data = [])
    {

        foreach ($data as $key => $row) {
            $config = $this->findByField('option_key', $key)->first();
            if ($config) {
                $this->update(['option_value' => $row], $config->id);
            } else {
                $this->create(['option_key'=>$key,'option_value'=>$row]);
            }
        }
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
