<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
//use Carbon\Carbon;
//use Request; // Using facade instead of "use Illuminate\Http\Request;"
use Illuminate\Http\Request; // Alternate to Form Requests validation

use App\Article;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => 'index']);// Check for all except "index" methods in controller
        //$this->middleware('auth', ['only' => 'create']);// Only check for "create" methods in controller
        //$this->middleware('auth');// Check for all methods in controller
    }
    
    public function index() {
        $articles = Article::latest('published_at')->published()->get();
        //$articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get(); // Moved query into model query scope
        //$articles = Article::order_by('published_at', 'desc')->get();
        
        //$latest = Article::latest()->first(); // Moved this to View Composer with-in app/provider/AppServiceProvider
        //return view('articles/index', compact('articles', 'latest'));
        return view('articles/index', compact('articles'));
    }
    
    public function show(Article $article) {
        //$article = Article::findOrFail($id); // Not needed anymore, now using route-model binding
        //dd($article->updated_at->addDays(8)->diffForHumans());
        //dd($article->created_at->addDays(8)->diffForHumans());
        //dd($article->created_at->addDays(8)->format('Y-m'));
        //dd($article->created_at->addDays(8));
        //dd($article->created_at->month);
        //dd($article->created_at->year);
        //dd($article->created_at); // By Default Carbon instance
        //dd($article->published_at); // Not Carbon instance
        //$article = Article::find($id);
        //dd($article);// die dump function
        
        /*if(is_null($article)){
            abort(404);
        }*/
            
        //if(!$article)
            
        return view('articles/show', compact('article')); // if "$article" is null "$article->title" will fail in view
        //return $article;
    }
    
    public function create() {
        
        /*
         * Basic check for Logined user
         * 
         * if(Auth::guest()){
            return redirect('articles');
        }*/

        $tags = \App\Tag::lists('name', 'id');
        return view('articles/create', compact('tags'));
    }
    
    //public function store(Request $request) { // Alternate to Form Requests validation
    public function store(ArticleRequest $request) {
        //$input = Request::all();// In-lined this
        // $input = Request::get('title');
        //$input['published_at'] = Carbon::now(); // Just gives time not date

        //$this->validate($request, ['title' => 'required', 'body' => 'required']); // Alternate to Form Requests validation

        //Article::create([]); // We can create new article like this too
        //$article = Auth::user()->articles()->create($request->all());// Get authenticated users id and create new article against it
          
        //$this->syncTags($article, $request->input('tag_list'));
        //$article->tags()->attach($request->input('tag_list'));
        
        $this->createArticle($request);// extracted method
        
        //use Session // Instead of using "use Session" or "\Session::flash" as golbal we can use "session()->flash"
        /*
         * Alternative syntax to "return redirect('articles')->with()"
         * 
        session()->flash('flash_message', 'Your article has been created!'); // temporarily added session item for just one request
        session()->flash('flash_message_important', true); // temporarily added session item for just one request
         */
        //\Session::flash('flash_message', 'Your article has been created!'); // temporarily added session item for just one request
        //\Session::put('flash_message', 'Your article has been created!');// permanently added session item
        
        /*
        $article = new Article($request->all());
        Auth::user()->articles()->save($article);// Get authenticated users id and save new article against it
        */
        
        //Article::create($request->all());// Alternative of above line when user_id is passed through form
        //Article::create(Request::all()); // Using "ArticleRequest $request", no longer needed

        
        /*
         * Facade alternative to helper function below "flash()"
        \Flash::info()
        \Flash::error()
        \Flash::success()
         */
        //session()->flash('flash_message','You signed up!');//Alternative to "flash()" below
        flash()->overlay('Your article has been created!', 'Good Job');// helper function alternative to Facade // overlay message
        //flash()->success('Your article has been created!');// helper function alternative to Facade // success message
        //flash('Your article has been created!');// helper function alternative to Facade // Information message
        //flash('Your article has been created!')->important();// helper function alternative to Facade
        /*
        return redirect('articles')->with([ // when we "redirect()" and call "with()", it assumens we are setting "session()->flash()"
            'flash_message' => 'Your article has been created!',
            'flash_message_important' => true
        ]);
        */
        return redirect('articles');
    }
    
    public function edit(Article $article) {
        //$article = Article::findOrFail($id); // Not needed anymore, now using route-model binding
        $tags = \App\Tag::lists('name', 'id');
        return view('articles/edit', compact('article', 'tags'));
    }
    
    public function update(Article $article, ArticleRequest $request) { // Here Laravel using "Reflection" to inject "Request" instance
        //$article = Article::findOrFail($id); // Not needed anymore, now using route-model binding
        $article->update($request->all());
        
        $this->syncTags($article, $request->input('tag_list'));
        //$article->tags()->sync($request->input('tag_list'));
        //$article->tags()->detach($request->input('tag_list'));// "detach" for removing items
        
        return redirect('articles');
    }
    
    private function syncTags(Article $article, array $tags) {
        $article->tags()->sync($tags);
    }
    
    private function createArticle(ArticleRequest $request) {
        $article = Auth::user()->articles()->create($request->all());// Get authenticated users id and create new article against it          
        $this->syncTags($article, $request->input('tag_list'));
        return $article;
    }
}
