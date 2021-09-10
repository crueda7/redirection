<?php

namespace Dnetix\Redirection\Traits;

use Dnetix\Redirection\Entities\Status;

trait StatusTrait
{
    /**
     * @var Status
     */
    protected Status $status;

    public function status(): Status
    {
        if ($this->status instanceof Status) {
            return $this->status;
        }

        return new Status([
            'status' => Status::ST_ERROR,
            'message' => 'No response status was provisioned',
            'reason' => '',
        ]);
    }

    public function isApproved(): bool
    {
        return $this->status()->status() == Status::ST_APPROVED;
    }

    public function isSuccessful(): bool
    {
        return !in_array($this->status()->status(), [Status::ST_ERROR, Status::ST_FAILED]);
    }

    public function isRejected(): bool
    {
        return $this->status()->status() == Status::ST_REJECTED;
    }
}
