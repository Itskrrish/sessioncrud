<form action="{{route('home.store')}}" method="post" enctype="multipart/form-data">
                   
                       @csrf
                     
						  <div class>
                                        <label for="name">name</label>
                                        <input type="text" class="form-control"  id="title" name="name" >
                                    </div>
                                      <div >
                                        <label for="password">password</label>
                                        <input type="password" class="form-control"  id="title" name="password" >
                                    </div>
                                      <div>
                                        <label for="email">email</label>
                                        <input type="email" class="form-control"  id="title" name="email" >
                                    </div>
									<div>
                                        <label for="title">image</label>
                                        <input type="file" class="form-control"  id="title" name="image" >
                                    </div>
									<div >
                                        <label for="title">Mobile</label>
                                        <input type="phone" class="form-control"  id="title" name="phone" >
                                    </div>
									<div>
                                        <label for="title">date</label>
                                        <input type="date" class="form-control"  id="title" name="date" >
                                    </div>
									<div>
                                        <label for="title">role</label>
                                        <input type="text" class="form-control"  id="title" name="role" >
                                    </div>
                                    <button type="submit">Submit<button>
                       </form> 