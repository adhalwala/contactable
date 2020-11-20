<?php
namespace Aecor\Contact\Traits;

use Aecor\Contact\Models\Contact;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasContact
{
    abstract public function morphMany($related, $name, $type = null, $id = null, $localKey = null);

    public function contacts(): MorphMany
    {
        return $this->morphMany(Contact::class, 'model');
    }

    public function addContact($data)
    {
        return $this->contacts()->create($data);
    }

    public function addManyContacts(array $records)
    {
        foreach ($records as $record) {
            $this->contacts()->create($record);
        }
    }
}
