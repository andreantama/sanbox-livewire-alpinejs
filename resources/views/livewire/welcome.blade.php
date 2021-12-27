<div>
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <div class="card-icon">
                    <i class="flaticon2-files-and-folders text-primary"></i>
                </div>
                <h3 class="card-label">Welcome</h3>
            </div>
            <div class="card-toolbar">
                <span>
                    <a href="" class="btn btn-icon btn-light-warning">
                        <span class="flaticon2-printer"></span>
                    </a>
                </span>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="" class="form-control-label">
                    {{$listSelected }}
                    <span class="text-danger"></span>
                </label>
                <div wire:ignore>
                    <select 
                    x-data="{
                        listSelected: @entangle('listSelected'),
                        listOptions: @entangle('listOptions')
                    }"
                    x-init="
                        $refs.select2ref.value = listSelected;
                        $($refs.select2ref).select2();
                        $refs.select2ref.change = () => listSelected = $refs.select2ref.value;
                    "
                    x-effect="
                        $refs.select2ref.value = listSelected;
                        $($refs.select2ref).select2();
                    "
                    x-ref="select2ref"

                    class="form-control">
                        <option value="all" :selected="listSelected === 'all'">Pilih Data</option>
                    <template x-for="row in listOptions">
                        <option :value="row.id" x-text="row.name" :selected="listSelected === row.id"></option>
                    </template>
                        
                    </select>
                </div>
                <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" wire:click="$set('listSelected', 4)">
                    Select to 4;
                </button>
            </div>
             <div class="form-group">
                <button class="btn btn-primary" wire:click="remove">
                    Remove id 5;
                </button>
            </div>
        </div>
    </div>
        <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <div class="card-icon">
                    <i class="flaticon2-files-and-folders text-primary"></i>
                </div>
                <h3 class="card-label">Date PIcker</h3>
            </div>
            <div class="card-toolbar">
                <span>
                    <a href="" class="btn btn-icon btn-light-warning">
                        <span class="flaticon2-printer"></span>
                    </a>
                </span>
            </div>
        </div>
        <div class="card-body">
           
            <div class="mb-10">
                <label for="" class="form-label">{{ $daterangepickerSelected }}</label>
                <div wire:ignore> 
                <input 
                x-data="{
                    selectedValue: @entangle('daterangepickerSelected')
                }"
                x-init="
                    $refs.pickdatee.value = selectedValue;
                    $($refs.pickdatee).daterangepicker();
                    $($refs.pickdatee).change(() => {
                        selectedValue = $refs.pickdatee.value;
                    });
                    $watch('selectedValue', value => {
                        if(value === null){
                            $refs.pickdatee.value = '';
                        }
                    });
                "
                x-ref="pickdatee"
                class="form-control" placeholder="Pick a date" id="kt_datepicker_1"/>
                </div>
            </div>
            <button class="btn btn-danger" wire:click="resetDate">Reset Datepicker</button>
        </div>
    </div>
</div>
