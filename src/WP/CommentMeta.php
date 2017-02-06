<?php

namespace WeDevs\ORM\WP;

class CommentMeta extends AbstractMeta
{
    /**
     * The meta type for the model metadata.
     *
     * @var string
     */
    protected $metaType = 'comment';

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return 'termmeta';
    }

    /**
     * Relationship: Comment
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commet()
    {
        return $this->belongsTo('WeDevs\ORM\WP\Comment', 'comment_id');
    }
}
