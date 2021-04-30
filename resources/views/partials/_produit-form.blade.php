<div class="form-group">
    <label for="">designation</label>
    <input value="{{ old('designation') ?? $produit->designation }}" type="text" name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
   
    @error("designation")               <!--pour afficher un message derreur; ca nou cree une variable $message ki va contenir direct le messag d la variable -->
       <small class="text-danger">{{ $message }}</small>
    @enderror

    </div>

    <div class="form-group">
      <label for="">prix</label>
      <input value="{{  old('prix') ?? $produit->prix }}" type="number" name="prix" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
                
        <!-- old() permet de recuperer le contenu de sk lutilisateur a sisi en cas dereur et reaffiche pour quil rectifi-->
              
      @error("prix")  
      <small class="text-danger">{{ $message }}</small>
      @enderror

    </div>

    <div class="form-group">
      <label for="">categorie</label>
      <select class="form-control" name="categorie_id" id="">
        @foreach ($categories as $categorie )
      <option {{ $categorie->id==$produit->categorie_id ? "selected":""}} value="{{  $categorie->id }}">{{ $categorie->libele }}</option>
             <!--old lui di ixi de retourner lancien id et dqficher le contenu   -->
       

      @endforeach
      </select>
    </div>
 
    <div class="form-group">
      <label for="">quantite</label>
      <input value="{{  old('quantite') ?? $produit->quantite }}"  type="number" name="quantite" id="" class="form-control" placeholder="" aria-describedby="helpId">
     
      @error("quantite")  
      <small class="text-danger">{{ $message }}</small>
      @enderror

    </div>

    <div class="form-group">
      <label for="">description</label>
      <textarea class="form-control" name="description" id="" rows="3">{{  old('description') ?? $produit->description }}</textarea>  <!--ixi on met le old dans rext area   -->
     
      @error("description")  
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="">images</label>
      <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
     
      @error("image")  
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary btn-block btn-lg mt-4">Valider</button> 