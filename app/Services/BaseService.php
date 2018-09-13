<?php

namespace App\Services;

use Stichoza\GoogleTranslate\TranslateClient;

class BaseService
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $_model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return $this->_model;
    }

    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->_model->all();
    }

    /**
     * Get More with conditionals
     * @param array $conditionals
     * @return mixed
     */
    public function getMore($conditionals = [])
    {
        $data = $this->_model->select(@$conditionals['select'] ? $conditionals['select'] : '*');
        if (@$conditionals['advance_conditional']) {
            if (is_array($conditionals['advance_conditional']) || is_object($conditionals['advance_conditional'])) {
                $data = $data->where($conditionals['advance_conditional']);
            } else {
                $data = $data->whereRaw($conditionals['advance_conditional']);
            }
        }
        if (@$conditionals['with']) $data = $data->with($conditionals['with']);
        if (@$conditionals['whereHas']) $data = $data->whereHas($conditionals['whereHas'][0], @$conditionals['whereHas'][1]);
        if (@$conditionals['order_by_raw']) $data = $data->orderByRaw($conditionals['order_by_raw']);
        return @$conditionals['more'] ? $data->get() : $data->first();
    }

    public function findCondition($colum, $conditional, $param)
    {
        return $this->_model->where($colum, $conditional, $param)->first();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id, $with = [])
    {
        $result = $this->_model->with($with)->find($id);
        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->_model->create($attributes);
    }

    /**
     * Create annh
     * @param array $attributes
     * @return $id
     */
    public function insertGetId(array $attributes)
    {
        return $this->_model->insertGetId($attributes);
    }

    /**
     * Insert
     * @param array $attributes
     * @return mixed
     */
    public function insert(array $attributes)
    {
        return $this->_model->insert($attributes);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();
            return true;
        }

        return false;
    }

    /**
     * find item by where
     *
     * @param $where
     * @return \Illuminate\Database\Eloquent\Model|null|object
     */
    public function findItemBy($where)
    {
        return $this->_model->where($where)->first();
    }

    /**
     * update or create table
     *
     * @param array $attributes
     * @param array $params
     * @return mixed
     */
    public function updateOrCreate($attributes = [], $params = [])
    {
        $model = $this->_model;
        return $model::updateOrCreate($attributes, $params);
    }

    /**
     * @param null $filters
     * @param null $advance_conditional
     * @param null $order_by_raw
     * @param int $per_page
     * @param array $with
     * @param null $whereHas
     * @param null $groupBy
     * @param string $select
     * @return mixed
     */
    public function filter($filters = null, $advance_conditional = null, $order_by_raw = null, $per_page = 10, $with = [], $whereHas = null, $groupBy = null, $select = '*')
    {
        $data = $this->_model->select($select ? $select : '*')->filter($filters);

        if ($advance_conditional) {
            if (is_array($advance_conditional) || is_object($advance_conditional)) {
                $data = $data->where($advance_conditional);
            } else {
                $data = $data->whereRaw($advance_conditional);
            }
        }


        if (($with)) $data = $data->with($with);

        if (($whereHas)) $data = $data->whereHas($whereHas[0], $whereHas[1]);

        if ($order_by_raw) {
            $data = $data->orderByRaw($order_by_raw);
        } else {
            $data = $data->orderBy('id', 'DESC');
        };

        if ($groupBy) $data = $data->groupBy($groupBy);
        return $data->paginate($per_page);
    }

    public function translateUtility($attribute = [])
    {
        $tr = new TranslateClient();
        $name = $attribute['name'];
        $address = $attribute['address'];

        $attribute['name'] = $tr->setSource($attribute['lang'])->setTarget('ja')->translate($name);
        $attribute['address'] = $tr->setSource($attribute['lang'])->setTarget('ja')->translate($address);

        $attribute['address_vi'] = $tr->setSource($attribute['lang'])->setTarget('vi')->translate($address);
        $attribute['address_en'] = $tr->setSource($attribute['lang'])->setTarget('en')->translate($address);
        $attribute['address_cn'] = $tr->setSource($attribute['lang'])->setTarget('zh-CN')->translate($address);
        $attribute['address_es'] = $tr->setSource($attribute['lang'])->setTarget('es')->translate($address);
        $attribute['address_ko'] = $tr->setSource($attribute['lang'])->setTarget('ko')->translate($address);

        $attribute['name_vi'] = $tr->setSource($attribute['lang'])->setTarget('vi')->translate($name);
        $attribute['name_en'] = $tr->setSource($attribute['lang'])->setTarget('en')->translate($name);
        $attribute['name_cn'] = $tr->setSource($attribute['lang'])->setTarget('zh-CN')->translate($name);
        $attribute['name_es'] = $tr->setSource($attribute['lang'])->setTarget('es')->translate($name);
        $attribute['name_ko'] = $tr->setSource($attribute['lang'])->setTarget('ko')->translate($name);

        if ($attribute['memo'] != "") {
            $memo = $attribute['memo'];
            $attribute['memo'] = $tr->setSource($attribute['lang'])->setTarget('ja')->translate($memo);
            $attribute['memo_vi'] = $tr->setSource($attribute['lang'])->setTarget('vi')->translate($memo);
            $attribute['memo_en'] = $tr->setSource($attribute['lang'])->setTarget('en')->translate($memo);
            $attribute['memo_cn'] = $tr->setSource($attribute['lang'])->setTarget('zh-CN')->translate($memo);
            $attribute['memo_es'] = $tr->setSource($attribute['lang'])->setTarget('es')->translate($memo);
            $attribute['memo_ko'] = $tr->setSource($attribute['lang'])->setTarget('ko')->translate($memo);
        }

        return $attribute;
    }
}