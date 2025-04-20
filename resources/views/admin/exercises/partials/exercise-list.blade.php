@if($exercises->isEmpty())
    <div class="text-center text-white mt-4">
        <h5>No exercises found.</h5>
    </div>
@endif

@foreach ($exercises as $exercise)
    <div class="item">
        <ul>
            <li>
                <img src="{{ asset($exercise->img ?? 'assets/images/workout-01.jpg') }}" alt="" class="templatemo-item">
            </li>
            <li><h4>Name</h4><span>{{ $exercise->name }}</span></li>
            <li><h4>Date Added</h4><span>{{ $exercise->created_at->format('d/m/Y') }}</span></li>
            <li><h4>Difficulty</h4><span>{{ ucfirst($exercise->difficulty) }}</span></li>
            <li>
                <div class="button-group">
                    <div class="main-border-button">
                        <a href="{{ route('admin.exercises.show', $exercise->id) }}">View</a>
                    </div>
                    <div class="main-border-button">
                        <a href="{{ route('admin.exercises.edit', $exercise->id) }}">Edit</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endforeach
