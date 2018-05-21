<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreatetextBlocksRequest;
use App\Http\Requests\Backend\UpdatetextBlocksRequest;
use App\Repositories\Backend\textBlocksRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class textBlocksController extends AppBaseController
{
    /** @var  textBlocksRepository */
    private $textBlocksRepository;

    public function __construct(textBlocksRepository $textBlocksRepo)
    {
        $this->textBlocksRepository = $textBlocksRepo;
    }

    /**
     * Display a listing of the textBlocks.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->textBlocksRepository->pushCriteria(new RequestCriteria($request));
        $textBlocks = $this->textBlocksRepository->all();

        return view('backend.text_blocks.index')
            ->with('textBlocks', $textBlocks);
    }

    /**
     * Show the form for creating a new textBlocks.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.text_blocks.create');
    }

    /**
     * Store a newly created textBlocks in storage.
     *
     * @param CreatetextBlocksRequest $request
     *
     * @return Response
     */
    public function store(CreatetextBlocksRequest $request)
    {
        $input = $request->all();

        $textBlocks = $this->textBlocksRepository->create($input);

        Flash::success('Text Blocks saved successfully.');

        return redirect(route('backend.textBlocks.index'));
    }

    /**
     * Display the specified textBlocks.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $textBlocks = $this->textBlocksRepository->findWithoutFail($id);

        if (empty($textBlocks)) {
            Flash::error('Text Blocks not found');

            return redirect(route('backend.textBlocks.index'));
        }

        return view('backend.text_blocks.show')->with('textBlocks', $textBlocks);
    }

    /**
     * Show the form for editing the specified textBlocks.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $textBlocks = $this->textBlocksRepository->findWithoutFail($id);

        if (empty($textBlocks)) {
            Flash::error('Text Blocks not found');

            return redirect(route('backend.textBlocks.index'));
        }

        return view('backend.text_blocks.edit')->with('textBlocks', $textBlocks);
    }

    /**
     * Update the specified textBlocks in storage.
     *
     * @param  int              $id
     * @param UpdatetextBlocksRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetextBlocksRequest $request)
    {
        $textBlocks = $this->textBlocksRepository->findWithoutFail($id);

        if (empty($textBlocks)) {
            Flash::error('Text Blocks not found');

            return redirect(route('backend.textBlocks.index'));
        }

        $textBlocks = $this->textBlocksRepository->update($request->all(), $id);

        Flash::success('Text Blocks updated successfully.');

        return redirect(route('backend.textBlocks.index'));
    }

    /**
     * Remove the specified textBlocks from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $textBlocks = $this->textBlocksRepository->findWithoutFail($id);

        if (empty($textBlocks)) {
            Flash::error('Text Blocks not found');

            return redirect(route('backend.textBlocks.index'));
        }

        $this->textBlocksRepository->delete($id);

        Flash::success('Text Blocks deleted successfully.');

        return redirect(route('backend.textBlocks.index'));
    }
}
