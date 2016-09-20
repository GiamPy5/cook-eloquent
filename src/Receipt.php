<?php

namespace Giampaolo\CookEloquent;

use Illuminate\Database\Eloquent\Model;
use Giampaolo\CookEloquent\Exceptions\UnknownModelException;

abstract class Receipt
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    abstract public function prepare();

    final public function run($replacementTags = [])
    {
        foreach ($this->replacementTags as $tag => $value)
            $this->setReplacementTag($tag, $value);

        $this->prepare();

        if (! ($this->model instanceof Model)) {
            throw new UnknownModelException("The base constructor has not been runned, please run it in your custom constructor.");
        }

        return $this->model->get();
    }

    final protected function setReplacementTag($tag, $value)
    {
        if (! is_string($tag)) {
            throw new \Exception("The tag must be a string.");
        }

        $this->tags[$tag] = $value;
    }

    final protected function getReplacementTag($tag, $default = null)
    {
        return (isset($this->tag[$tag]) ? $this->tag[$tag] : $default;
    }

    final protected function grt($tag, $default = null)
    {
        return $this->getReplacementTag($tag, $default);
    }

    final public function __call($method, $args)
    {
        return call_user_func_array([$this, $this->model->$method], $args);
    }
}