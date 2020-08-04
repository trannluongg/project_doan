import $ from "jquery";

const CartHandel = {
    init()
    {
        this.amountIncrease();
        this.amountReduction();
        this.amountChange();
    },

    amountIncrease()
    {
        $('#amount-increase').click(function ()
        {
            let $amount = $('#amount');
            let $valueAmount = $amount.val();
            if ($valueAmount > 9) return alert('Không được đặt quá 10 sản phẩm');
            $amount.val(parseInt($valueAmount) + 1);
        })
    },

    amountReduction()
    {
        $('#amount-reduction').click(function ()
        {
            let $amount = $('#amount');
            let $valueAmount = $amount.val();
            if ($valueAmount <= 1) return alert('Số lượng sản phẩm không được nhỏ hơn 1');
            $amount.val(parseInt($valueAmount) - 1);
        })
    },

    amountChange()
    {
        $('#amount').change(function ()
        {
            let $value = $(this).val();

            if (isNaN($value))
            {
                console.log('dsjdsjsd');
                $value = 1;
            }
            else{
                if ($value > 10)
                {
                    alert('Không được đặt quá 10 sản phẩm');
                    $value = 10;
                }
            }

            $(this).val(parseInt($value));
        });
    },
};

export default CartHandel;
