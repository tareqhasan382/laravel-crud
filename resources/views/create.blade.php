<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Create Post</title>
</head>
<body class=" px-10 container w-full h-full flex flex-col items-center justify-center ">
    <div class=" w-full flex items-center justify-between my-5 ">
        <h1 class=" text-xl font-bold text-rose-500 ">Create Post</h1>
        <a href="/" class=" text-white font-bold px-4 py-2 rounded-3xl bg-gray-800 ">Back to Home</a>
    </div>
    <div class=" w-full h-full mx-auto " >
        <form method="POST" action="{{route('store')}}" class=" w-full h-full grid grid-cols-2 gap-5 mx-auto " enctype="multipart/form-data" >
            @csrf
           <div>
            <input type="text" name="name" placeholder="name" class=" w-full p-2 outline outline-1 outline-black rounded-md " value="{{'name'}}" >
            @error('name')
            <div class=" text-rose-500 ">{{ $message }}</div>
            @enderror

           </div>
          <div>
            <input type="text" name="desc" placeholder="description" class=" w-full p-2 outline outline-1 outline-black rounded-md " value="{{'desc'}}" >
            @error('desc')
            <div class=" text-rose-500 ">{{ $message }}</div>
            @enderror
          </div>
           <div class=" w-1/2 flex flex-col item-left justify-center gap-6 " >
         <div>
            <input type="file" name="image" >
            @error('image')
            <div class=" text-rose-500 ">{{ $message }}</div>
            @enderror
         </div>
           <button type="submit" class=" w-full bg-gray-800 text-white py-2 rounded-md font-bold text-lg " >Submit</button>
           </div>
        </form>
    </div>
</body>
</html>