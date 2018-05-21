<table class="table table-responsive" id="galleries-table">
    <thead>
        <tr>
            <!-- <th>Title</th>
            <th>Text</th> -->
            <th>Small_img</th>
            <th>Big_img</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($galleries as $gallery)
        <tr>
            {{--<td>{!! $gallery->title !!}</td>--}}
            <td>{!! $gallery->small_img !!}</td>
            <td>{!! $gallery->img !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.galleries.destroy', $gallery->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.galleries.show', [$gallery->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('backend.galleries.edit', [$gallery->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>