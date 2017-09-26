

<?php $__env->startSection('content'); ?>

<div class="container">

<div >
    <ul class="pager">
        <li><a href="<?php echo e(route('book.index')); ?> ">Previous</a></li>
    </ul>
</div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Book: <STRONG><?php echo e($book->title); ?></STRONG></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('book.update', ['book' => $book->id])); ?> " enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="<?php echo e($book->title); ?>" required autofocus>

                                <?php if($errors->has('title')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('yearOfRelease') ? ' has-error' : ''); ?>">
                            <label for="yearOfRelease" class="col-md-4 control-label">Year of Release</label>

                            <div class="col-md-6">
                                <input id="yearOfRelease" type="number" class="form-control" name="yearOfRelease" value="<?php echo e($book->yearOfRelease); ?>" required>

                                <?php if($errors->has('yearOfRelease')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('yearOfRelease')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('author_first_name') ? ' has-error' : ''); ?>">
                            <label for="author_first_name" class="col-md-4 control-label">Author First Name</label>

                            <div class="col-md-6">
                                <input id="author_first_name" type="text" class="form-control" name="author_first_name" value="<?php echo e($book->Authors{0}->name); ?>" required>

                                <?php if($errors->has('author_first_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('author_first_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('author_surname') ? ' has-error' : ''); ?>">
                            <label for="author_surname" class="col-md-4 control-label">Author Surname </label>

                            <div class="col-md-6">
                                <input id="author_surname" type="text" class="form-control" name="author_surname" value="<?php echo e($book->Authors{0}->surname); ?>" required>

                                <?php if($errors->has('author_surname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('author_surname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                         <div class="form-group<?php echo e($errors->has('publisher') ? ' has-error' : ''); ?>">
                            <label for="publisher" class="col-md-4 control-label">Publisher</label>

                            <div class="col-md-6">
                                <input id="publisher" type="text" class="form-control" name="publisher" value="<?php echo e($book->Publisher->name); ?>" required>

                                <?php if($errors->has('publisher')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('publisher')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('isbn') ? ' has-error' : ''); ?>">
                            <label for="isbn" class="col-md-4 control-label">ISBN</label>

                            <div class="col-md-6">
                                <input id="isbn" type="number" class="form-control" name="isbn" value="<?php echo e($book->isbn); ?>" required>

                                <?php if($errors->has('isbn')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('isbn')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" value="<?php echo e($book->price); ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="stock" class="col-md-4 control-label">Stock</label>

                            <div class="col-md-6">
                                <input id="stock" type="number" class="form-control" name="stock" value="<?php echo e($book->stock); ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="<?php echo e($book->description); ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">

                                <select id="category_id" name="category_id" class="custom-select">
                                <option selected>Select a Category</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($category->parent==NULL && count($category->children)!=0): ?>
                                        <optgroup label="<?php echo e($category->type); ?>">
                                            <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($child->id); ?>"><?php echo e($child->type); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </optgroup>
                                        <?php elseif($category->parent==NULL && count($category->children)==0): ?>
                                            <optgroup label="<?php echo e($category->type); ?>">
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->type); ?> </option>
                                            </optgroup>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                       <div class="form-group">
                            <label for="imageURL" class="col-md-4 control-label">imageURL</label>

                            <div class="col-md-6">
                                <input id="imageURL" type="file"  name="imageURL" value="<?php echo e($book->imageURL); ?> " >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>




<div >
    <ul class="pager">
        <li><a href="<?php echo e(route('book.index')); ?> ">Previous</a></li>
    </ul>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>