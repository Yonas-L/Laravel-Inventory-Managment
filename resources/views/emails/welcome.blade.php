<x-mail::message>
# Welcome Dear {{$UserName}}!!
 
<div class=" flex justify-center place-items-center ">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQ2UrTlZCf4PD_Iwu3lKszu2ApeP4bvmK2IawVQz7Qxg&s" alt="">
</div>

<h2>
We are so Excited that you have joined our
Lovely community. All of us at I-Sell are
tryng our best to make your inventory managment 
easy and efficient.
</h2>
<x-mail::button :url="'http://127.0.0.1:8000/'">
Go to I-Sell
</x-mail::button>

Thanks,<br>
<h2>{{ config('app.name') }}</h2>
</x-mail::message>
