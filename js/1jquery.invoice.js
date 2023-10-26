/**
 * jQuery Invoice Plugin v1.0             
 *	                                           
 * Version 1.0, January - 2016	           
 * Author: Firoz Ahmad Likhon <likh.deshi@gmail.com>               
 * Website: https://github.com/likhonlikh 
 *                                            
 * Copyright (c) 2016 Firoz Ahmad         
 * Released under the MIT license
      ___            ___  ___    __    ___      ___  ___________  ___      ___
     /  /           /  / /  /  _/ /   /  /     /  / / _______  / /   \    /  /
    /  /           /  / /  /_ / /    /  /_____/  / / /      / / /     \  /  /
   /  /           /  / /   __|      /   _____   / / /      / / /  / \  \/  /
  /  /_ _ _ _ _  /  / /  /   \ \   /  /     /  / / /______/ / /  /   \    /
 /____________/ /__/ /__/     \_\ /__/     /__/ /__________/ /__/     /__/
 Likhon the hackman, who claims himself as a hacker but really he isn't.
 */

(function (jQuery) {
    $.opt = {};  // jQuery Object

    jQuery.fn.invoice = function (options) {
        var ops = jQuery.extend({}, jQuery.fn.invoice.defaults, options);
        $.opt = ops;

        var inv = new Invoice();
        inv.init();

        jQuery('body').on('click', function (e) {
            var cur = e.target.id || e.target.className;

            if (cur == $.opt.addRow.substring(1))
                inv.newRow(divisions);

            if (cur == $.opt.addImageRow.substring(1))
                inv.newImageRow(images);

            if (cur == $.opt.addRowTheme.substring(1))
                inv.newRowTheme();

            if (cur == $.opt.delete.substring(1))
                inv.deleteRow(e.target);

            if (cur == $.opt.deleteImage.substring(1))
                inv.deleteImageRow(e.target);

             if (cur == $.opt.deleteTheme.substring(1))
                inv.deleteRowTheme(e.target);

            inv.init();
        });

        jQuery('body').on('keyup', function (e) {
            inv.init();
        });

        return this;
    };
}(jQuery));

function Invoice() {
    self = this;
}

Invoice.prototype = {
    constructor: Invoice,

    init: function () {
        // this.calcTotal();
        // this.calcTotalQty();
        // this.calcSubtotal();
        // this.calcGrandTotal();
    },

    /**
     * Calculate total price of an item.
     *
     * @returns {number}
     */
    // calcTotal: function () {
    //      jQuery($.opt.parentClass).each(function (i) {
    //          var row = jQuery(this);
    //          var total = row.find($.opt.price).val() * row.find($.opt.qty).val();

    //          total = self.roundNumber(total, 2);

    //          row.find($.opt.total).html(total);
    //      });

    //      return 1;
    //  },
	
    /***
     * Calculate total quantity of an order.
     *
     * @returns {number}
     */
    calcTotalQty: function () {
         var totalQty = 0;
         jQuery($.opt.qty).each(function (i) {
             var qty = jQuery(this).val();
             if (!isNaN(qty)) totalQty += Number(qty);
         });

         totalQty = self.roundNumber(totalQty, 2);

         jQuery($.opt.totalQty).html(totalQty);

         return 1;
     },

    /***
     * Calculate subtotal of an order.
     *
     * @returns {number}
     */
    calcSubtotal: function () {
         var subtotal = 0;
         jQuery($.opt.total).each(function (i) {
             var total = jQuery(this).html();
             if (!isNaN(total)) subtotal += Number(total);
         });

         subtotal = self.roundNumber(subtotal, 2);

         jQuery($.opt.subtotal).html(subtotal);

         return 1;
     },

    /**
     * Calculate grand total of an order.
     *
     * @returns {number}
     */
    calcGrandTotal: function () {
        var grandTotal = Number(jQuery($.opt.subtotal).html())
                       - Number(jQuery($.opt.discount).val());
        grandTotal = self.roundNumber(grandTotal, 2);

        jQuery($.opt.grandTotal).html(grandTotal);

        return 1;
    },

    /**
     * Add a row.
     *
     * @returns {number}
     */
    newRow: function (products) {
        var finalducts = products.innerHTML;
        var newSelection = finalducts;
        jQuery(".item-row:last").after('<tr class="item-row"><td class="item-name"><div class="delete-btn">'+newSelection+'<a class=' + $.opt.delete.substring(1) + ' href="javascript:;" title="Remove row">X</a></div></td><td class="menus_select_append"><select class="form-control divisions" name="selected_members[]" id="selected_members" required="required"><option value="">--- First Select Division ---</option></td></tr>');
        if (jQuery($.opt.delete).length > 0) {
            jQuery($.opt.delete).show();
        }
        return 1;
    },

    newImageRow: function (images) {
        console.log(images);
        var finalducts = images.innerHTML;
        var newSelection = finalducts;
        jQuery(".item-image-row:last").after('<input type="file" id="event_images" name="event_images[]" accept="image/jpeg, image/png, image/jpg" required="required" class="form-control" />');
        if (jQuery($.opt.deleteImage).length > 0) {
            jQuery($.opt.deleteImage).show();
        }

        return 1;
    },


    newRowTheme: function (products) {
        jQuery(".item-row-theme:last").after('<tr class="item-row-theme"><td class="item-name"><div class="delete-btn-theme"><a class=' + $.opt.deleteTheme.substring(1) + ' href="javascript:;" title="Remove row">X</a></div></td><td><input class="form-control theme_name" placeholder="Theme Name" type="text" name="theme_name[]" required></td><td><input type="file" name="theme_photo[]" id="theme_photo" required></td></tr>');
        if (jQuery($.opt.deleteTheme).length > 0) {
            jQuery($.opt.deleteTheme).show();
        }

        return 1;
    },

    /**
     * Delete a row.
     *
     * @param elem   current element
     * @returns {number}
     */
    deleteRow: function (elem) {
        jQuery(elem).parents($.opt.parentClass).remove();

        if (jQuery($.opt.delete).length < 2) {
            jQuery($.opt.delete).hide();
        }

        return 1;
    },

     deleteImageRow: function (elem) {
        console.log(jQuery(elem).parents($.opt.parentClassImages));
        return false;
        jQuery(elem).parents($.opt.parentClassImages).remove();

        if (jQuery($.opt.deleteImage).length < 2) {
            jQuery($.opt.deleteImage).hide();
        }

        return 1;
    },

    deleteRowTheme: function (elem) {
        jQuery(elem).parents($.opt.parentThemeClass).remove();

        if (jQuery($.opt.deleteTheme).length < 2) {
            jQuery($.opt.deleteTheme).hide();
        }

        return 1;
    },
};

/**
 *  Publicly accessible defaults.
 */
jQuery.fn.invoice.defaults = {
    addRow: "#addRow",
    addImageRow : "#addImageRow",
    addRowTheme : "#addRowTheme",
    delete: ".delete",
    deleteTheme : ".deleteTheme",
    parentClass: ".item-row",
    parentThemeClass : ".item-row-theme",
    allDivisions : "#divisions",
    allImages : "#images",
    parentClassImages: ".item-image-row",
    deleteImage: ".deleteImage",
};
