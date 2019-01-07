<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models\MiniModels{
/**
 * App\Models\MiniModels\OuterUsers
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name 用户名
 * @property int $sex 性别
 * @property string $email 邮箱
 * @property string $password 密码
 * @property string $phone 手机号
 * @property string $headimgurl 头像
 * @property int $role_id 角色id,1超级管理员,2管理员,3普通管理员
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterUsers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterUsers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterUsers query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterUsers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterUsers whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterUsers whereHeadimgurl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterUsers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterUsers whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterUsers wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterUsers wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterUsers whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterUsers whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterUsers whereUpdatedAt($value)
 */
	class OuterUsers extends \Eloquent {}
}

namespace App\Models\MiniModels{
/**
 * App\Models\MiniModels\OuterBrands
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id 用户Id
 * @property string $name 品牌名称
 * @property string $address 品牌地址
 * @property string $logo_url 品牌logo
 * @property string $introduce 品牌介绍
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterBrands newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterBrands newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterBrands query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterBrands whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterBrands whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterBrands whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterBrands whereIntroduce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterBrands whereLogoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterBrands whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterBrands whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MiniModels\OuterBrands whereUserId($value)
 */
	class OuterBrands extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Poetries
 *
 * @property int $id
 * @property string $title 诗的标题
 * @property string $author 作者
 * @property string $content 内容
 * @property string $mp3_url 音频地址
 * @property int $is_available 该条信息是否可用,1可用,0不可用
 * @property string $uniq_code 唯一码
 * @property string $short_introduce 短简介
 * @property string $detail 详情页
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $sub_content 诗词内容
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Poetries newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Poetries newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Poetries query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Poetries whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Poetries whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Poetries whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Poetries whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Poetries whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Poetries whereIsAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Poetries whereMp3Url($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Poetries whereShortIntroduce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Poetries whereSubContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Poetries whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Poetries whereUniqCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Poetries whereUpdatedAt($value)
 */
	class Poetries extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name 角色名称
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Task
 *
 * @property int $id
 * @property string $name 任务名称
 * @property int $type 任务类型,1听一听
 * @property int $is_pass 是否通过,0不通过,1通过
 * @property int|null $operator_id 执行任务的id
 * @property int|null $task_id 相应表的id
 * @property string $describe 描述
 * @property string $reason 拒绝原因
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereIsPass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereUpdatedAt($value)
 */
	class Task extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Users
 *
 * @property int $id 用户id
 * @property string $name 用户名
 * @property int $sex 性别
 * @property string $email 邮箱
 * @property string $password 密码
 * @property string $phone 手机号
 * @property string $headimgurl 头像
 * @property int $role_id 角色id,1超级管理员,2管理员,3普通管理员
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users whereHeadimgurl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users whereUpdatedAt($value)
 */
	class Users extends \Eloquent {}
}

