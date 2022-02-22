<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class FiatWithdraw extends Resource
{
    protected $withoutFields = [];

    protected $method;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->filterFields([
            'id' => $this->id,
            'amount' => $this->amount,
            'currency' => $this->fiatCurrency->symbol,
            'status' => $this->status,
            'swift_code' => $this->swift_code,
            'note' => $this->note,
            'bank_name' => $this->bank_name,
            'recipient' => $this->recipient,
            'iban' => $this->iban,
            'user' => $this->user,
            'evaluator' => $this->evaluator,
            'created_at' => $this->created_at->toIso8601String(),
            'evaluated_at' => $this->evaluated_at,
        ]);
    }

    public function with($request)
    {
        return [
            'success' => true,
        ];
    }

    /**
     * Get only defined fields.
     *
     * @param array $fields
     * @return $this
     */
    public function only(array $fields)
    {
        $this->withoutFields = $fields;

        return $this;
    }

    /**
     * Remove the filtered keys.
     *
     * @param $array
     * @return array
     */
    protected function filterFields($array)
    {
        if ($this->withoutFields) {
            return collect($array)->only($this->withoutFields)->toArray();
        }

        return collect($array)->toArray();
    }
}
