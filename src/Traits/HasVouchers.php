<?php

namespace BeyondCode\Vouchers\Traits;

use BeyondCode\Vouchers\Facades\Vouchers;

trait HasVouchers
{
    /**
     * Set the polymorphic relation.
     *
     * @return mixed
     */
    public function vouchers()
    {
        return $this->morphMany(config('vouchers.voucher_model'), 'model');
    }

    /**
     * @param int $amount
     * @param array $data
     * @param null $expires_at
     * @return mixed[]
     */
    public function createVouchers(int $amount, array $data = [], $expires_at = null)
    {
        return Vouchers::create($this, $amount, $data, $expires_at);
    }

    /**
     * @param array $data
     * @param null $expires_at
     * @return mixed
     */
    public function createVoucher(array $data = [], $expires_at = null)
    {
        $vouchers = Vouchers::create($this, 1, $data, $expires_at);

        return $vouchers[0];
    }
}
