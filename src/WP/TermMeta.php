<?php

namespace WeDevs\ORM\WP;

class TermMeta extends AbstractMeta
{
    /**
     * The meta type for the model metadata.
     *
     * @var string
     */
    protected $metaType = 'term';

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
     * Relationship: Term
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function term()
    {
        return $this->belongsTo('WeDevs\ORM\WP\Term', 'term_id');
    }
}
