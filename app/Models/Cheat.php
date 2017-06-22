<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 20-Jun-2017
 * Time: 13:04
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Cheat
 *
 * @property int $id
 * @property int $cheat_group_id
 * @property string $description
 * @property bool $layout
 * @property string $usage
 * @property string $source
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereCheatGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereLayout($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereSource($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereUsage($value)
 * @mixin \Illuminate\Database\Eloquent\
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CheatContent[] $cheatContents
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 */
class Cheat extends BaseModel
{
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function cheatContents()
    {
        return $this->hasMany(CheatContent::class);
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
        $this->exists = true;
    }

    /**
     * @param int $cheat_group_id
     */
    public function setCheatGroupId($cheat_group_id)
    {
        $this->cheat_group_id = $cheat_group_id;
    }

    /**
     * @param string|null $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param bool $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * @param string|null $usage
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;
    }

    /**
     * @param string|null $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @param \Carbon\Carbon $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @param \Carbon\Carbon $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @param CheatContent[] $cheatContents
     */
    public function setCheatContents($cheatContents)
    { //TODO make object? so convert string to object
        if(empty($this->relations['cheatContents'])) $this->relations['cheatContents'] = [];
        $this->relations['cheatContents'] = array_merge($this->relations['cheatContents'], $cheatContents);
    }

    /**
     * @param Tag[] $tags
     */
    public function setTags($tags)
    {
        if(empty($this->relations['tags'])) $this->relations['tags'] = [];
        $this->relations['tags'] = array_merge($this->relations['tags'], $tags);
    }


}