<p>Hello {{ $team->name }}</p>

<p>You have a new comment on your team page written by: <a href="{{ url('teams/' . $team->id) }}">{{ $comment->user->name }}</a></p>
