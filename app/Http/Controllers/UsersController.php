<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserRequest;
use App\Models\Friend;
use App\Models\House;
use App\Models\User;
use App\Traits\FileHandler;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\File;
use Illuminate\Http\JsonResponse as JsonResponseAlias;
use Illuminate\Http\RedirectResponse as RedirectResponseAlias;
use Illuminate\Routing\Redirector;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    use FileHandler;

    /**
     * @return JsonResponseAlias
     */
    public function data(): JsonResponseAlias
    {
        $users = User::query();


        return DataTables::eloquent($users)
            ->addColumn('name', function ($user) {
                return $user->first_name . ' ' . $user->last_name;
            })
            ->addColumn('books', function ($user) {
                return $user->books->implode('name', ', ');
            })
            ->filterColumn('books', function ($query, $keyword) {
                $query->whereHas('books', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%");
                });
            })
            ->addColumn('house', function ($user) {
                return $user->house->address;
            })
            ->filterColumn('house', function ($query, $keyword) {
                $query->whereHas('house', function ($query) use ($keyword) {
                    $query->where('address', 'like', "%$keyword%");
                });
            })
            ->addColumn('friends', function ($user) {
                return $user->friends->pluck('name')->implode(', ');
            })
            ->filterColumn('friends', function ($query, $keyword) {
                $query->whereHas('friends', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%");
                });
            })
            ->addColumn('action', function ($user) {
                return "
                    <div class='d-flex'>
                        <a href='" . route('users.show', $user->id) . "' class='btn btn-xs btn-info'>
                            <i class='bi bi-chevron-bar-right'></i>
                        </a>
                        <button type='button' class='btn btn-xs btn-danger remove-item-from-table-btn'
                                data-deleteurl ='" . route('users.destroy', $user->id) . "' >
                            <i class='bi bi-trash3-fill'></i>
                        </button>
                    </div>";
            })
            ->toJson();
    }

    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('welcome');
    }

    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $houses = House::all();
        $friends = Friend::all();
        $method = 'POST';
        return view('form', compact(['method', 'houses', 'friends']));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function show($id): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::findOrFail($id);
        $userHouse = $user->house;
        $userFriends = $user->friends()->paginate(3);
        $files = $user->files()->paginate(3);
        $houses = House::all();
        $friends = Friend::all();
        return view('show', compact(['user', 'userHouse', 'userFriends', 'files', 'houses', 'friends']));
    }

    /**
     * @param StoreUpdateUserRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|Application|RedirectResponseAlias|Redirector
     */
    public function store(StoreUpdateUserRequest $request): Application|Redirector|RedirectResponseAlias|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->validated();
        $data['status'] = json_encode($data['status']);
        $user = User::create($data);

        return $this->handleImageExistence($data, $user, $request);
    }

    /**
     * @param $id
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function edit($id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::find($id);
        $method = 'PUT';
        $houses = House::all();
        $friends = Friend::all();
        return view('form', compact(['user', 'method', 'houses', 'friends']));
    }

    /**
     * @param StoreUpdateUserRequest $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|Application|RedirectResponseAlias|Redirector
     */
    public function update(StoreUpdateUserRequest $request, $id): Application|Redirector|RedirectResponseAlias|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->validated();

        $user = User::findOrFail($id);
        $user->update($data);

        return $this->handleImageExistence($data, $user, $request);
    }

    /**
     * @param $id
     * @return JsonResponseAlias
     */
    public function destroy($id): JsonResponseAlias
    {
        User::find($id)->delete();
        return response()->json(['message' => 'deleted successfully']) ;
    }

    public function deleteImage($id): JsonResponseAlias
    {
        $image = \App\Models\File::find($id);
        $image->delete();
        return response()->json(['message' => 'deleted successfully']);
    }

    public function deleteFriend($user_id, $friend_id): RedirectResponseAlias
    {
        $user = User::find($user_id);
        $user->friends()->detach($friend_id);
        return redirect()->back();
    }

    /**
     * @param mixed $data
     * @param $user
     * @param StoreUpdateUserRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|Application|RedirectResponseAlias|Redirector
     */
    public function handleImageExistence(mixed $data, $user, StoreUpdateUserRequest $request): RedirectResponseAlias|\Illuminate\Contracts\Foundation\Application|Redirector|Application
    {
        if (isset($data['friends']))
            $user->friends()->attach($data['friends']);

        if ($request->hasFile('image') != null) {
            $file = new File($request->file('image'));
            $file = $this->storeFile($file, 'users');
            $type = $request->file('image')->getMimeType();
            $user->files()->create([
                'path' => $file,
                'type' => $type
            ]);
        }

        return redirect()->route('users.show', $user->id);
    }
}
