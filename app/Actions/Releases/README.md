# Release Actions

This directory contains action classes that encapsulate business logic for release operations, following Laravel conventions and SOLID principles.

## Actions

### PublishReleaseAction
**Purpose:** Makes a release available for download.

**Usage:**
```php
$action = app(PublishReleaseAction::class);
$updatedRelease = $action->execute($release);
```

**Responsibilities:**
- Set `is_downloadable` to `true`
- Set `published_at` if not already set
- Dispatch `ReleasePublished` event

### UnpublishReleaseAction
**Purpose:** Makes a release unavailable for download (marks as draft).

**Usage:**
```php
$action = app(UnpublishReleaseAction::class);
$updatedRelease = $action->execute($release);
```

**Responsibilities:**
- Set `is_downloadable` to `false`
- Dispatch `ReleaseUnpublished` event

### DeleteReleaseAction
**Purpose:** Delete a release from both database and GitHub.

**Usage:**
```php
$action = app(DeleteReleaseAction::class);
$action->execute($release);
```

**Responsibilities:**
- Delete associated artifacts
- Delete release from database
- Delete release and tag from GitHub (non-blocking)
- Dispatch `ReleaseDeleted` event

## Design Principles

### Single Responsibility Principle (SRP)
Each action class has one responsibility: performing a specific operation on a release.

### Open/Closed Principle
Actions are open for extension (can be decorated or wrapped) but closed for modification.

### Dependency Inversion Principle
Actions depend on abstractions (interfaces) rather than concrete implementations. The `DeleteReleaseAction` depends on `GithubService` injected via constructor.

### Don't Repeat Yourself (DRY)
Common logic is extracted into action classes, eliminating repetition in the controller.

### Keep It Simple, Stupid (KISS)
Each action has a single public method `execute()` with clear inputs and outputs.

## Events

All actions dispatch events for logging and potential side effects:
- `ReleasePublished` - When a release is published
- `ReleaseUnpublished` - When a release is unpublished
- `ReleaseDeleted` - When a release is deleted

These events handle logging automatically, keeping the action classes focused on business logic.

## Testing

Actions can be easily unit tested in isolation:

```php
public function test_can_publish_release(): void
{
    $release = Release::factory()->unpublished()->create();
    $action = new PublishReleaseAction();

    $result = $action->execute($release);

    $this->assertTrue($result->is_downloadable);
    $this->assertNotNull($result->published_at);
}
```

## Benefits

1. **Testability:** Business logic is isolated and easily testable
2. **Reusability:** Actions can be used from controllers, commands, jobs, etc.
3. **Maintainability:** Changes to business logic are centralized
4. **Readability:** Controller remains thin and focused on HTTP concerns
5. **Extensibility:** Easy to add new actions or modify existing ones
