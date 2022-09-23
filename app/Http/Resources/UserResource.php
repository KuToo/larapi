<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,//ID
            'account' => $this->account,//账号
            'mobile' => $this->mobile,//手机号
            'name' => $this->name,//昵称
            'account_type' => $this->account_type,//账号类型
            'authenticating_state' => $this->authenticating_state,//认证状态
            'examine_reject_reason' => $this->examine_reject_reason,//审核不通过原因
            'user_channel_filing_status' => $this->user_channel_filing_status,//所有产品报备状态
        ];
    }
}
