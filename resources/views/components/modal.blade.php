@if ($type == 'delete')
   <div class="modal fade" id="confirm{{ $targetName }}" tabindex="-1" aria-labelledby="confirm{{ $targetName }}Label" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="{{ $targetName }}ModalLabel">Supprimer l'article ?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
               <form action="{{ route($route, $target->id) }}" method="POST">
                  @csrf
                  @method("delete")
                  <button type="submit" class="btn btn-danger">Supprimer</button>
               </form>   
         </div>
         </div>
      </div>
   </div>  
@endif
