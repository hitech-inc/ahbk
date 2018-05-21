<table class="table table-responsive" id="certificates-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Text</th>
        <th>Img</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($certificates as $certificate)
        <tr>
            <td>{!! $certificate->title !!}</td>
            <td>{!! $certificate->text !!}</td>
            <td>{!! $certificate->img !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.certificates.destroy', $certificate->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.certificates.show', [$certificate->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('backend.certificates.edit', [$certificate->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>