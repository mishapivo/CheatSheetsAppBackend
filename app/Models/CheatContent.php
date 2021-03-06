<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 20-Jun-2017
 * Time: 13:04
 */
namespace App\Models;

use Admin\Models\BaseModel;
use Znck\Eloquent\Traits\BelongsToThrough;


/**
 * App\Models\CheatContent
 *
 * @property int $id
 * @property int $cheat_id
 * @property string $content
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatContent whereCheatId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatContent whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatContent whereId($value)
 * @mixin \Illuminate\Database\Eloquent\
 * @property-read \App\Models\CheatSheet $cheat_sheet
 */
class CheatContent extends BaseModel
{
    use BelongsToThrough;

    public $guarded = [];

    public $timestamps = false;

    public function cheat_sheet()
    {
        return $this->belongsToThrough(CheatSheet::class, [CheatGroup::class, Cheat::class]);
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param int $cheat_id
     */
    public function setCheatId($cheat_id)
    {
        $this->cheat_id = $cheat_id;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}