<?php

use Illuminate\Database\Seeder;
use App\Attachment;
use App\Stage;

class AttachmentsTableSeeder extends Seeder
{
    public function run()
    {
        Stage::get()->each(function ($stage) {
            if (($rand = rand(1, 2)) > 1) {
                $attachments = factory(Attachment::class, $rand)->make();
                $attachments->each(function ($attachment) use ($stage) {
                    $this->saveAttachment($attachment, $stage);
                });
            } else {
                $attachment = factory(Attachment::class)->make();
                $this->saveAttachment($attachment, $stage);
            }
        });
    }

    protected function saveAttachment(Attachment $attachment, Stage $stage)
    {
        $attachment->stage()->associate($stage);
        $attachment->save();
    }
}
