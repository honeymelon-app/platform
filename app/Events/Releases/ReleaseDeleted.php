<?php

declare(strict_types=1);

namespace App\Events\Releases;

use App\Models\Release;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ReleaseDeleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public readonly Release $release,
        public readonly string $tag
    ) {
        Log::info('Release deleted', [
            'release_id' => $this->release->id,
            'version' => $this->release->version,
            'tag' => $this->tag,
        ]);
    }
}
