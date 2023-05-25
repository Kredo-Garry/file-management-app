{{-- Show Notes Modal --}}
<div class="modal fade" id="note-modal-{{$show_file_details->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable border-dark">
      <div class="modal-content border-dark">
        <div class="modal-header border-dark">
          <h1 class="modal-title fs-5" id="">File Notes</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            @if ($show_file_details->note->isNotEmpty())
                @foreach ($show_file_details->note as $note)
                    <form action="{{route('note.edit', $note->id)}}" method="post">
                    @csrf
                    @method('PATCH')


                    <p class="text-muted p-0 m-0"><span class="fw-bold small">Notes created by:</span> {{$note->user->name}}</p>
                    <p class="text-muted p-0 m-0"><span class="fw-bold small">Notes created On:</span> {{$note->user->created_at}}</p>
                    <hr>
                    <div class="mb-2">
                        @error('edit_notes')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                        <textarea name="edit_notes" id="edit-notes" cols="30" rows="5" class="form-control text-muted border border-top-0 border-end-0 border-start-0 border-bottom-0">{{old('edit_notes', $note->file_notes)}}</textarea>

                        {{-- <input type="text" name="edit_notes" id="edit-notes" class="form-control mb-2 text-muted border border-top-0 border-end-0 border-start-0 border-bottom-0" value="{{old('edit_notes', $note->file_notes)}}"> --}}
                    </div>
                    {{-- <p class="text-muted p-0 m-0"><span class="fw-bold small">Notes created by:</span> {{$note->user->name}}</p>
                    <p class="text-muted p-0 m-0"><span class="fw-bold small">Notes created On:</span> {{$note->user->created_at}}</p>
                    <hr>
                    <p class="text-muted"><span class="fw-bold">Notes:</span> {{$note->file_notes}}</p> --}}



                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Save changes</button>
                </form>
                @endforeach
            @else
                <p class="text-muted text-center">No Notes Yet</p>
            @endif


        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
