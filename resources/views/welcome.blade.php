<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
</head>
<body class=" px-10 container w-full h-full flex flex-col items-center justify-center ">
    <div class=" w-full flex items-center justify-between my-5 ">
        <h1 class=" text-xl font-bold text-rose-500 ">Welcome to World!</h1>
       
        <a href="/create" class=" text-white font-bold px-4 py-2 rounded-3xl bg-gray-800 ">Create New Post</a>
    </div>
    @if (session('success'))
    <h1 class=" text-xl font-bold text-rose-500 ">{{session('success')}}</h1>
    @endif
    <div class=" w-full h-20 grid grid-cols-5 gap-4 bg-gray-900 text-white rounded items-center justify-center text-xl font-bold">
        <h3 class=" w-full text-left pl-5 " >id</h3>
        <h3 class=" w-full text-center  " >Image</h3>
        <h3 class=" w-full text-center ">Name</h3>
        <h3 class=" w-full text-center ">Description</h3>
        <h3 class=" w-full text-center ">Action</h3>
    </div>
    @foreach ($posts as $item)
    <div class=" w-full h-full grid grid-cols-5 gap-4 rounded my-5 items-center  ">
        
        <h3 class=" w-full text-left pl-5">{{$item->id}} </h3>
        <div class=" w-full " >
<img class=" w-20 h-20 object-cover  " src="images/{{$item->image}}" alt="Image">
        </div>
        <h3 class=" w-full text-center ">{{$item->name}} </h3>
        <h3 class=" w-full text-center ">{{$item->desc}}</h3>
        <div class=" w-full flex gap-5 items-center justify-center ">
           <a href="{{route('edit',$item->id)}}" class=" w-full text-center p-4 bg-gray-900 text-white rounded uppercase "> update  </a>
           <a  href="{{route('delete',$item->id)}}" >
            <button class=" w-full text-center p-4 bg-rose-500 text-white rounded uppercase "> delete  </button>
           </a>
            
       
        </div>
     
      
    </div>
    <div class=" w-full h-[1px] bg-gray-500 "></div>
   
    @endforeach
   <div class=" w-full p-2 ">
    {{ $posts->links() }}
   </div>
</body>
</html>