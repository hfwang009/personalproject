<table class="table table-striped table-edit">
    <tbody>
    <tr>
        <td>
            <div class="form-group">
                <span class="col-sm-2 col-xs-3 control-label">备注:</span>
                <div class="col-sm-9 col-xs-8">
                    <textarea class="form-control introduction" value="<?php echo $product['remarks'];?>" id="product_remarks" rows="20"><?php echo $product['remarks'];?></textarea>
                    <input type="hidden" id="product_ids" value="<?php echo $id ?>">
                </div>
            </div>
        </td>
    </tr>
    </tbody>
</table>