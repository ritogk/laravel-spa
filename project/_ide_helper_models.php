<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models {
    /**
     * App\Models\AdminUser
     *
     * @property int $id
     * @property string $name
     * @property string $email
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property string $password
     * @property string|null $remember_token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read int|null $notifications_count
     * @method static \Illuminate\Database\Eloquent\Builder|AdminUser newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|AdminUser newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|AdminUser query()
     * @method static \Illuminate\Database\Eloquent\Builder|AdminUser whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|AdminUser whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|AdminUser whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|AdminUser whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|AdminUser whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|AdminUser wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|AdminUser whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|AdminUser whereUpdatedAt($value)
     */
    class AdminUser extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Entry
     *
     * @property int $id
     * @property int $job_id 仕事ID
     * @property int $user_id 会員ID
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property-read \App\Models\Job $jobs
     * @property-read \App\Models\User $user
     * @method static \Database\Factories\EntryFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|Entry newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Entry newQuery()
     * @method static \Illuminate\Database\Query\Builder|Entry onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|Entry query()
     * @method static \Illuminate\Database\Eloquent\Builder|Entry whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Entry whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Entry whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Entry whereJobId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Entry whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Entry whereUserId($value)
     * @method static \Illuminate\Database\Query\Builder|Entry withTrashed()
     * @method static \Illuminate\Database\Query\Builder|Entry withoutTrashed()
     */
    class Entry extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Job
     *
     * @property int $id
     * @property string $title タイトル
     * @property string $content 内容
     * @property int $attention 注目の求人
     * @property int $job_category_id 仕事カテゴリID
     * @property int $price 金額
     * @property string|null $welfare 福利厚生
     * @property string|null $holiday 休日
     * @property string $image 画像パス
     * @property int $sort_no 並び順
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Entry[] $entries
     * @property-read int|null $entries_count
     * @property-read \App\Models\JobCategory $jobCategory
     * @method static \Illuminate\Database\Eloquent\Builder|Job newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Job newQuery()
     * @method static \Illuminate\Database\Query\Builder|Job onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|Job query()
     * @method static \Illuminate\Database\Eloquent\Builder|Job whereAttention($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Job whereContent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Job whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Job whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Job whereHoliday($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Job whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Job whereImage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Job whereJobCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Job wherePrice($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Job whereSortNo($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Job whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Job whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Job whereWelfare($value)
     * @method static \Illuminate\Database\Query\Builder|Job withTrashed()
     * @method static \Illuminate\Database\Query\Builder|Job withoutTrashed()
     */
    class Job extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\JobCategory
     *
     * @property int $id
     * @property string $name 名称
     * @property string $content 内容
     * @property string $image 画像パス
     * @property int $sort_no 並び順
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Job[] $job
     * @property-read int|null $job_count
     * @method static \Database\Factories\JobCategoryFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|JobCategory newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|JobCategory newQuery()
     * @method static \Illuminate\Database\Query\Builder|JobCategory onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|JobCategory query()
     * @method static \Illuminate\Database\Eloquent\Builder|JobCategory whereContent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|JobCategory whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|JobCategory whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|JobCategory whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|JobCategory whereImage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|JobCategory whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|JobCategory whereSortNo($value)
     * @method static \Illuminate\Database\Eloquent\Builder|JobCategory whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|JobCategory withTrashed()
     * @method static \Illuminate\Database\Query\Builder|JobCategory withoutTrashed()
     */
    class JobCategory extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\NewsLetter
     *
     * @property int $id
     * @property string $subject 件名
     * @property string $message メッセージ
     * @property int $send 送信済
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter newQuery()
     * @method static \Illuminate\Database\Query\Builder|NewsLetter onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter query()
     * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter whereMessage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter whereSend($value)
     * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter whereSubject($value)
     * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|NewsLetter withTrashed()
     * @method static \Illuminate\Database\Query\Builder|NewsLetter withoutTrashed()
     */
    class NewsLetter extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\User
     *
     * @property int $id
     * @property string $name
     * @property string $email
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property string $password
     * @property string|null $remember_token
     * @property string $self_pr 自己PR
     * @property string $tel 電話番号
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Entry[] $entries
     * @property-read int|null $entries_count
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read int|null $notifications_count
     * @method static \Database\Factories\UserFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User query()
     * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereSelfPr($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereTel($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
     */
    class User extends \Eloquent
    {
    }
}
