<template>
    <form method="POST" :action="route('tour.store')" enctype="multipart/form-data" autocomplete="on">
        <input type="hidden" name="_token" :value="csrf" />
        <!-- @csrf -->
        
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="number">Number:</label>
                <input
                    id="number"
                    name="number"
                    v-model.number="form.number"
                    type="number"
                    class="form-control bg-white fw-bold"
                    required
                />
            </div>
            <div class="col-md-6">
                <label class="form-label text-md-center">Date:</label>
                <VueDatePicker 
                    id="date" 
                    name="date" 
                    v-model="form.date" 
                    :format="'dd.MM.yyyy. HH:mm'" 
                    locale="hr" 
                    auto-apply
                    required
                />
            </div>
            <!-- <div class="col-md-6">
                <label class="form-label text-md-center">Date:</label>
                <input
                    id="date"
                    name="date"
                    v-model="form.date"
                    type="date"
                    class="form-control bg-white"
                    required
                />
            </div> -->

            <div class="col-md-4">
                <label class="form-label text-md-center">Guest Name:</label>
                <input
                    id="guest_name"
                    name="guest_name"
                    v-model="form.guest_name"
                    type="text"
                    class="form-control bg-white"
                    required
                />
            </div>
            <div class="col-md-4">
                <label class="form-label text-md-center">Guest Address:</label>
                <input
                    id="guest_address"
                    name="guest_address"
                    v-model="form.guest_address"
                    type="text"
                    class="form-control bg-white"
                    required
                />
            </div>
            <div class="col-md-4">
                <label class="form-label text-md-center">Guest Phone:</label>
                <input
                    id="guest_phone"
                    name="guest_phone"
                    v-model="form.guest_phone"
                    type="text"
                    class="form-control bg-white"
                    required
                />
            </div>


            <div class="col-md-6">
                <label class="form-label text-md-end">Tour type:</label>
                <select
                    class="form-select bg-white w-100"
                    id="tour_service_id"
                    name="tour_service_id"
                    v-model="form.tour_service_id"
                    required
                >
                    <option value="" selected disabled>-- Choose an option --</option>
                        <option
                            v-for="tourService in tourServices"
                            :key="tourService.id"
                            :value="tourService.id"
                            v-text="tourService.name"
                        ></option>
                </select>
            </div>
        
        
            <div class="col-md-6">
                <label class="form-label text-md-end mb-2">Pick-up point:</label>
                <select
                    class="form-select bg-white w-100"
                    id="tour_pickup_point_id"
                    name="tour_pickup_point_id"
                    v-model="form.tour_pickup_point_id"
                    required
                >
                    <option value="" selected disabled>-- Choose an option --</option>
                        <option
                            v-for="pickupPoint in pickupPoints"
                            :key="pickupPoint.id"
                            :value="pickupPoint.id"
                            v-text="pickupPoint.name"
                        ></option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label text-md-end">No. of Adults:</label>
                <input
                    id="adults_amount"
                    name="adults_amount"
                    min="0"
                    v-model.number="form.adults_amount"
                    type="number"
                    class="form-control bg-white"
                    required
                />
            </div>
            <div class="col-md-4">
                <label class="form-label text-md-end">No. of Children:</label>
                <input
                    id="children_amount"
                    name="children_amount"
                    min="0"
                    v-model.number="form.children_amount"
                    type="number"
                    class="form-control bg-white"
                    required
                />
            </div>
            <div class="col-md-4">
                <label class="form-label text-md-end">No. of Infants:</label>
                <input
                    id="infants_amount"
                    name="infants_amount"
                    min="0"
                    v-model.number="form.infants_amount"
                    type="number"
                    class="form-control bg-white"
                    required
                />
            </div>
            <div class="col-md-3">
                <label class="form-label text-md-end">Discount %:</label>
                <input
                    id="discount"
                    name="discount"
                    placeholder="0-99"
                    type="number"
                    min="0"
                    max="99"
                    v-model.number="form.discount"
                    class="form-control bg-white"
                />
            </div>
            <div class="col-md-3">
                <label class="form-label text-md-end">Total price:</label>
                <input
                    id="total_price"
                    name="total_price"
                    :value="totalPrice"
                    type="number"
                    class="form-control fw-bold"
                    tabindex="-1"
                    required
                    readonly
                />
            </div>
            <div class="col-md-3">
                <label class="form-label text-md-end">Paid amount:</label>
                <input
                    id="paid_amount"
                    name="paid_amount"
                    v-model.number="form.paid_amount"
                    type="number"
                    class="form-control bg-white"
                    step="0.01"
                    min="0"
                    required
                />
            </div>
            <div class="col-md-3">
                <label class="form-label text-md-end">Rest to pay:</label>
                <input
                    id="rest_to_pay_amount"
                    name="rest_to_pay_amount"
                    :value="restPay"
                    type="number"
                    class="form-control text-primary fw-bold"
                    required
                    readonly
                />
            </div>
            <div class="col-md-12">
                <textarea
                    class="form-control bg-white"
                    name="note"
                    v-model="form.note"
                    placeholder="Note"
                ></textarea>
            </div>
        </div>
        <div class="row g-3 mt-1 justify-content-center">
            <div class="col-auto">
                <a href="{{ route('home') }}" class="btn  btn-outline-danger">
                    <i class="bi-arrow-left-square"></i> Discard</a>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn  btn-outline-primary">
                    <i class="bi bi-save"></i> Save
                </button>
            </div>
        </div>  
    </form>
</template>

<script>
export default {
    props: {
        nextTour: Number,
        tourServices: Array,
        pickupPoints: Array,
        old: {
            default: {},
            required: false,
        },
        edit: {
            default: false,
        },
    },
    data() {
        return {
            csrf: null,
            form: {
                number: this.nextTour,
                guest_name: null,
                guest_address: null,
                guest_phone: null,
                tour_service_id: 1,
                tour_pickup_point_id: 1,
                adults_amount: 0,
                children_amount: 0,
                infants_amount: 0,
                date: new Date(),
                discount: 0,
                total_price: 0,
                paid_amount: 0,
                rest_to_pay_amount: null,
                note: null,
            },
        }
    },
    created() {
        this.csrf = document.querySelector('meta[name="csrf-token"]').content;

        if (!_.isEmpty(this.old)) {
            this.form = {
                ...this.form,
                ...this.old,
            };
        }
    },
    computed: {
        totalPrice() {
            let tour_service = this.tourServices.find((tour) => tour.id == this.form.tour_service_id),
                adults = Number(this.form.adults_amount * tour_service.adults_price),
                children = Number(this.form.children_amount * tour_service.children_price),
                infants = Number(this.form.infants_amount * tour_service.infants_price),
                sum = (adults + children + infants),
                total = sum - (sum * this.form.discount / 100)
            return Number(total).toFixed(2)
        },
        restPay() {
            let rest = this.totalPrice - this.form.paid_amount
            return Number(rest).toFixed(2)
        },
    }
}
</script>
