
<div ng-cloak class="blog-section" ng-app="myApp13" ng-controller="myCtrt13" >
    <div class="container">
      <div class="conference-form">
        <!-- col-md-6 -->
        <h4>Blog</h4>

        <div class="form-group">
  				 <label>Title <span class="red-text">*</span></label>
  				 <input placeholder="Please enter  title" type="text"  id="title" ng-model="title" ng-value="title"  class="form-control title required"  >
  					<p ng-show="submitc && title == ''" class="text-danger">Title is required.</p>
  			 </div>

         <div class="form-group">
   				 <label>Image <span class="red-text">*</span></label>
   				 <input onchange="angular.element(this).scope().uploadImage(this)"  type="file"  id="logoview"   class="form-control title required"  >
           <!-- <img  id="logoview" alt="" class="ng-scope" src="" width="100" height="100"> -->
   					<p ng-show="submitc && image == ''" class="text-danger">Image is required.</p>
   			 </div>

        <div class="form-group">
         <label>Category <span class="red-text">*</span></label>
         <select  ng-model="category"  id="category" class="form-control category" >
        <option value="">Select Category</option>
        <option ng-repeat="(key,x) in allcategory"  value="{{ x.categoryId }}">{{ x.category }}</option>
         </select>
         <p ng-show="submitc && category == ''" class="text-danger">Please select category</p>
       </div>

       <div class="form-group">
        <label>Tags<span class="red-text">*</span> (Hit enter to create tags of the word entered)</label>
      <input  type="text" placeholder="Please enter tag" ng-enter="tagadd()" ng-value="tagname" ng-model="tagname" id="tagsnew"   class="form-control"  >
      <div id="tags"><a ng-repeat="x in tags"  > {{ x }}<span hand ng-click="deletetag($index)" > &times; </span></a></div>
      <p ng-show="submitc && tags.length == 0" class="text-danger">Tags is required.</p>
    </div>

    <div class="form-group">
      <label>Description <span class="red-text">*</span></label>
      <!-- ckeditor -->
   <textarea placeholder="Please enter description" type="text" name="description" id="description" ng-model="description" ng-value="description" class="form-control description ckeditor required" ></textarea>
   <p ng-show="submitc && description == ''" class="text-danger">Description is required.</p>
    </div>




  <input type="button" ng-click="submitblog()" class="btn search-btn" name="submit" value="submit">

    </div>


      </div>
    </div>
