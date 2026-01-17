<?php

declare(strict_types=1);

namespace App\Events\Releases;

use App\Models\Release;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ReleaseUnpublished
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public readonly Release $release
    ) {
        Log::info('Release unpublished', [
            'release_id' => $this->release->id,
            'version' => $this->release->version,
            'channel' => $this->release->channel,
        ]);
    }
}
