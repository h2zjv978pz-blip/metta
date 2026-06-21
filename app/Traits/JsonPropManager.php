<?php

// Updated: 2024-04-17 [SkB]

namespace App\Traits;

use App\Helpers\Utils;

trait JsonPropManager {
    public function prop($key, $default = false) {
        $propField = $this->propField ?? 'props';

        return $this->getJson($propField, $key, $default);
    }

    public function getLsKey($key)
    {
        $content_lang = Utils::getContentLang();

        return $content_lang != 'en' ? $key . '_' . $content_lang : $key;
    }

    public function getJson($col, $key, $default = false) {
        $isArrayCast = isset($this->casts[$col]) && $this->casts[$col] == 'array';
        $props = $isArrayCast ? $this->{$col} : json_decode($this->{$col}, true);
        $ls_key = $this->getLsKey($key);

        if (isset($props[$ls_key])) {
            return $props[$ls_key];
        }
        elseif (isset($props[$key])) {
            return $props[$key];
        }

        return $default;
    }

    public function setJson($jsonColumn, $newData) {
        $isArrayCast = isset($this->casts[$jsonColumn]) && $this->casts[$jsonColumn] == 'array';
        $currData = $isArrayCast ? $this->{$jsonColumn} : json_decode($this->{$jsonColumn}, true);

        if (empty($currData)) {
            $currData = array();
        }

        if (!empty($newData)) {
            $this->mapData($newData, $currData);
            $this->{$jsonColumn} = !empty($currData) ? ($isArrayCast ? $currData : json_encode($currData)) : null;
        }
        else {
            $this->{$jsonColumn} = null;
        }
    }

    public function setProps($newData) {
        $this->setJson('props', $newData);
    }

    private function mapData($newData, &$currData) {
        foreach ($newData as $key => $value) {
            /*
            if (is_array($value)) {
                $this->mapData($value, $currData[$key]);
            }
            */
            if ($value === null || $value === '' || $value === [] || in_array($value, ['/'], true)) {
                if (isset($currData[$key])) {
                    unset($currData[$key]);
                }
            }
            else {
                $currData[$key] = $value;
            }
        }
    }
}
