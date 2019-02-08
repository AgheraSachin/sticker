<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\ParticipateUserContest;

class UniqueParticipateContest implements Rule
{
    protected $user_id;
    protected $match_id;
    protected $contest_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($user_id, $contest_id,$match_id)
    {
        $this->user_id = $user_id;
        $this->contest_id = $contest_id;
        $this->match_id = $match_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $items = ParticipateUserContest::where([
            'user_id' => $this->user_id,
            'contest_id' => $this->contest_id,
            'match_id' => $this->match_id
        ])->get();
        if ($items->count()) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
