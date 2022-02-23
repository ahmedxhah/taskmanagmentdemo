<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs" style="background: yellow;">
        <div class="col-sm-6">
        <div class="card bg-c-blue order-card" >
                <div class="card-block">
                    <h6 class="m-b-20">Total Tasks</h6>
                    <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>{{@$alltask}}</span></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4 bg-white rounded-lg shadow-xs mt-4" style="background: #03a9f4;">
        <div class="col-sm-6">
        <div class="card bg-c-blue order-card" >
                <div class="card-block">
                    <h6 class="m-b-20">Completed Tasks</h6>
                    <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>{{@$completed}}</span></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4 bg-white rounded-lg shadow-xs mt-4" style="background: #ff5757">
        <div class="col-sm-6">
        <div class="card bg-c-blue order-card" >
                <div class="card-block">
                    <h6 class="m-b-20">Pending Tasks</h6>
                    <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>{{@$pending}}</span></h2>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
