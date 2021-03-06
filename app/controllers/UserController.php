<?php
/**
 * Created by PhpStorm.
 * User: Linfinity
 * Date: 6/9/16
 * Time: 1:54 PM
 */
class UserController extends BaseController {
    public function home() {

        $user = Auth::user();;
        $posts = $user->post;//->orderBy('updated_at', 'DESC');
        return View::make('home', array('posts'=>$posts, 'username'=>$user->username));
        //return View::make('home',compact('posts'));
    }

    public function getLogin(){

        return View::make('login');
    }

    public function postLogin(){
        // validate user input
        $rules = array(
            'username'=>'required',
            'password'=>'required|min:4'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()){
            //form invalid
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }

        // attempt to login user
        else {
            $userdata = array(
                'username'=>Input::get('username'),
                'password'=>Input::get('password')
            );

            $remember = Input::has('remember') ? true:false;

            if (Auth::attempt($userdata, $remember)){
                //authentication successfull
                return Redirect::route('home');
            }

            else {
                //authentication failed
                return Redirect::to('login')->with('message','Invalid username/password combination.')
                    ->with('alert-class','alert-danger');
            }
        }
    }

    public function getRegister(){
        return View::make('register');
    }

    public function postRegister(){
        // validete user input
        $validator = User::validate(Input::all());
        if ($validator->passes()) {
            // attempt to register the user
            User::create(array(
                'username'=>Input::get('username'),
                'email'=>Input::get('email'),
                'password'=>Input::get('password')
            ));

            return Redirect::route('login')->withMessage('You have successfully registered!');
        }

        return Redirect::route('register')->withErrors($validator);
    }

    public function logout() {
        Auth::logout();
        return Redirect::route('login')
            ->withInput(Input::except('password'))
            ->with('message','You have successfully logged out!');
    }
    
    public function postDetail() {
        $user = Auth::user();
        $postid = Input::get("postid");
        $post = Post::find($postid);
        if ($user == null) { // need it to prevent a non-user accessing a post
            return View::make('login');
        } elseif ($post != null) {
            return View::make('postDetail', array('user'=>$user, 'post'=>$post));
        } else {
            return View::make('noPostDetail');
        }
    }

    public function editPost() {
        $user = Auth::user();
        $postid = Input::get("postid");
        $post = Post::find($postid);
        if ($user == null) {
            return View::make('login');
        } elseif ($post != null) {
            return View::make('editPost', array('postid'=>$postid, 'title'=>$post->title, 'content'=>$post->content));
        } else {
            return View::make('noPostDetail');
        }
    }

    public function updatePost() {
        $user = Auth::user();
        $postid = Input::get("postid");
        $post = Post::find($postid);
        $validator = Post::validate(Input::all());
        if ($validator->passes()) {
            // attempt to update the post
            $newpost = array('title'=>Input::get('title'), 'content'=>Input::get('content'), 'user_id'=>$user->id);
            $post->update($newpost);
            return Redirect::route('home')->withMessage('Your post has been updated!');
        }
        return Redirect::route('editPost', array('postid'=>$postid, 'title'=>$post->title, 'content'=>$post->content))->withErrors($validator);
    }

    public function getNewPost() {
        return View::make('newPost');
    }

    public function postNewPost() {
        $user = Auth::user();
        $validator = Post::validate(Input::all());
        if ($validator->passes()) {
            // attempt to create the new post
            Post::create(array(
                'user_id'=>$user->id,
                'title'=>Input::get('title'),
                'content'=>Input::get('content'),
            ));

            return Redirect::route('home')->withMessage('posted!');
        }

        return Redirect::route('newPost')->withErrors($validator);
    }

    public function deletePost() {
        $user = Auth::user();
        $postid = Input::get("postid");
        $post = Post::find($postid);
        if ($user == null) { // need it to prevent a non-user accessing a post
            return View::make('login');
        } elseif ($post != null) {
            $post->delete();
            return Redirect::route('home')->withMessage('The post has been deleted!');
        } else {
            return View::make('noPostDetail');
        }

    }
}