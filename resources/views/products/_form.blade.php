<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('model') ? 'has-error' : '' !!}">
    {!! Form::label('model', 'Model') !!}
    {!! Form::text('model', null, ['class' => 'form-control']) !!}
    {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('price') ? 'has-error' : '' !!}">
    {!! Form::label('price', 'Price') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('category_lists') ? 'has-error' : '' !!}">
    {!! Form::label('category_lists', 'Categories') !!}
    {{-- Simplify things, no need to implement ajax for now --}}
    {!! Form::select('category_lists[]', ['' => '']+App\Models\Category::lists('title', 'id')->all(), null, ['class' => 'form-control js-selectize', 'multiple']) !!}
    {!! $errors->first('category_lists', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('photo') ? 'has-error' : '' !!}">
    {!! Form::label('photo', 'Product photo (jpeg, png)') !!}
    {!! Form::file('photo', ['class' => 'form-control']) !!}
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    @if(isset($product) && $product->photo !== '')
        <div class="row">
            <div class="col-md-6">
                <p>Current photo.</p>
                <div class="thumbnail">
                    <img src="{{ url('/img/' . $product->photo) }}" class="img-rounded">
                </div>
            </div>
        </div>
    @endif
</div>

{!! Form::submit(isset($product) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) !!}