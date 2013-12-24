# ViewModel

This library provides a basic contract for View Models as part of the MVVM
design pattern. The idea is to write an abstraction between the Model or data
you are trying to present and the View template. By doing this, we create
an object which can be tested for correctness without having to test the full
output of request, while hopefully maintaining compatibility with existing view 
layers.

This library is a work in progress, it may go somewhere or may not. I have a
number of ideas for features that would be good to have:

* VM's constructed of Traits rather than traditional inheritance
* Documentation support - define the functionality of template via method docblocks
* And other things I haven't yet thought through!


