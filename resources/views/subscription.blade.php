@extends('index')

@section('cards')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="section-title mb-4 pb-2">
                <h1 class=" mb-4">{{$course->title }}</h1>
                <p class="text-muted para-desc mx-auto mb-0">{{$course->description }}</p>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="rounded shadow-lg p-4">
                            <h5 class="mb-0">Billing Details :</h5>

                            <form class="mt-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group position-relative">
                                            <label>Your Name <span class="text-danger">*</span></label>
                                            <input name="name" id="firstname" type="text" class="form-control" placeholder="First Name :">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-12">
                                        <div class="form-group position-relative">
                                            <label>Last Name <span class="text-danger">*</span></label>
                                            <input name="name" id="lastname" type="text" class="form-control" placeholder="Last Name :">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-12">
                                        <div class="form-group position-relative">
                                            <label>Company Name <span class="text-muted">(Optional)</span></label>
                                            <input name="name" id="companyname" type="text" class="form-control" placeholder="Company Name :">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-12">
                                        <div class="form-group position-relative">
                                            <label>Street address <span class="text-danger">*</span></label>
                                            <input type="text" name="address1" id="address1" class="form-control" placeholder="House number and street name :">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-12">
                                        <div class="form-group position-relative">
                                            <label>Apartment, suite, unit etc. <span class="text-muted">(Optional)</span></label>
                                            <input type="text" name="address2" id="address2" class="form-control" placeholder="Apartment, suite, unit etc. :">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Town / City <span class="text-danger">*</span></label>
                                            <input type="text" name="city" id="city" class="form-control" placeholder="City Name :">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Postal Code <span class="text-danger">*</span></label>
                                            <input type="text" name="postcode" id="postcode" class="form-control" placeholder="Zip :">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>State <span class="text-danger">*</span></label>
                                            <input type="text" name="state" id="state" class="form-control" placeholder="State Name :">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Country <span class="text-danger">*</span></label>
                                            <select class="form-control custom-select">
                                                <option selected="">India</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AX">&Aring;land Islands</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AQ">Antarctica</option>
                                            </select>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-12">
                                        <div class="form-group position-relative">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="State Name :">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-12">
                                        <div class="form-group position-relative">
                                            <label>Your Email <span class="text-danger">*</span></label>
                                            <input name="email" id="email" type="email" class="form-control" placeholder="Your email :">
                                        </div> 
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form><!--end form-->
                        </div>

                        <div class="form-check form-check-inline my-4">
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="newaccount">
                                    <label class="custom-control-label" for="newaccount">Create an account ?</label>
                                </div>
                            </div>
                        </div>

                        <div class="rounded shadow-lg p-4">
                            <div class="form-check form-check-inline">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="addnewaddress">
                                        <label class="custom-control-label" for="addnewaddress">Ship to a different address ?</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group position-relative">
                                <label>Comments</label>
                                <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Notes about your order :"></textarea>
                            </div> 
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="rounded shadow-lg p-4">
                            <div class="d-flex mb-4 justify-content-between">
                                <h5>4 Items</h5>
                                <a href="shop-cart.html" class="text-muted h6">Show Details</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-center table-padding mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="h6 border-0">Subtotal</td>
                                            <td class="text-center font-weight-bold border-0">$ 2409</td>
                                        </tr>
                                        <tr>
                                            <td class="h6">Shipping Charge</td>
                                            <td class="text-center font-weight-bold">$ 0.00</td>
                                        </tr>
                                        <tr class="bg-light">
                                            <td class="h5 font-weight-bold">Total</td>
                                            <td class="text-center text-primary h4 font-weight-bold">$ 2409</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <ul class="list-unstyled mt-4 mb-0">
                                    <li>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="form-group mb-0">
                                                <input type="radio" id="banktransfer" checked="checked" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="mt-3">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="form-group mb-0">
                                                <input type="radio" id="chaquepayment" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="chaquepayment">Cheque Payment</label>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="mt-3">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="form-group mb-0">
                                                <input type="radio" id="cashpayment" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="cashpayment">Cash on Delivery</label>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="mt-3">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="form-group mb-0">
                                                <input type="radio" id="paypal" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="paypal">Paypal <a href="https://www.paypal.com/uk/webapps/mpp/paypal-popup" target="_blank" class="ml-2 text-primary">What is paypal?</a></label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <div class="mt-4 pt-2">
                                    <a href="shop-checkouts.html" class="btn btn-block btn-primary">Place Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </div><!--end container-->
        </section><!
    <!--end row-->
</div>
<!--end container-->

@endsection