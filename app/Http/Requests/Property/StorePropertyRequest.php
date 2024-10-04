<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'property_type_id' => 'required|exists:property_types,id',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'price_after_dicount' => 'nullable|numeric|min:0|lt:price',
            'feature' => 'boolean',
            'installment_amount' => 'nullable|numeric|min:0',
            'area' => 'required|numeric|min:0',
            'bedroom' => 'required|integer|min:0',
            'bathroom' => 'required|integer|min:0',
            'benefits' => 'required|array',
            'benefits.*' => 'exists:benefits,id',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string|in:available,sold,rented',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'property_type_id.required' => 'نوع العقار مطلوب.',
            'property_type_id.exists' => 'نوع العقار المحدد غير صالح.',
            'title.required' => 'عنوان العقار مطلوب.',
            'title.max' => 'عنوان العقار يجب ألا يتجاوز 255 حرفًا.',
            'description.required' => 'وصف العقار مطلوب.',
            'price.required' => 'سعر العقار مطلوب.',
            'price.numeric' => 'سعر العقار يجب أن يكون رقمًا.',
            'price.min' => 'سعر العقار يجب أن يكون 0 أو أكثر.',
            'price_after_dicount.numeric' => 'مبلغ الخصم يجب أن يكون رقمًا.',
            'price_after_dicount.min' => 'مبلغ الخصم يجب أن يكون 0 أو أكثر.',
            'price_after_dicount.lt' => 'المبلغ بعد الخصم يجب أن يكون أقل من السعر.',
            'feature.boolean' => 'حقل مميز يجب أن يكون نعم أو لا.',
            'installment_amount.numeric' => 'مبلغ القسط يجب أن يكون رقمًا.',
            'installment_amount.min' => 'مبلغ القسط يجب أن يكون 0 أو أكثر.',
            'area.required' => 'مساحة العقار مطلوبة.',
            'area.numeric' => 'مساحة العقار يجب أن تكون رقمًا.',
            'area.min' => 'مساحة العقار يجب أن تكون 0 أو أكثر.',
            'bedroom.required' => 'عدد غرف النوم مطلوب.',
            'bedroom.integer' => 'عدد غرف النوم يجب أن يكون رقمًا صحيحًا.',
            'bedroom.min' => 'عدد غرف النوم يجب أن يكون 0 أو أكثر.',
            'bathroom.required' => 'عدد الحمامات مطلوب.',
            'bathroom.integer' => 'عدد الحمامات يجب أن يكون رقمًا صحيحًا.',
            'bathroom.min' => 'عدد الحمامات يجب أن يكون 0 أو أكثر.',
            'benefits.required' => 'مزايا العقار مطلوبة.',
            'benefits.array' => 'مزايا العقار يجب أن تكون مصفوفة.',
            'benefits.*.exists' => 'إحدى مزايا العقار المحددة غير صالحة.',
            'images.required' => 'صور العقار مطلوبة.',
            'images.array' => 'صور العقار يجب أن تكون مصفوفة.',
            'images.min' => 'يجب تحميل صورة واحدة على الأقل.',
            'images.*.image' => 'الملف المحدد يجب أن يكون صورة.',
            'images.*.mimes' => 'الصورة يجب أن تكون من نوع: jpeg, png, jpg, gif.',
            'images.*.max' => 'حجم الصورة يجب ألا يتجاوز 2 ميجابايت.',
            'status.required' => 'حالة العقار مطلوبة.',
            'status.in' => 'حالة العقار يجب أن تكون متاح، مباع، أو مؤجر.',
            'latitude.required' => 'موقع العقار مطلوب.',
            'longitude.required' => 'موقع العقار مطلوب.',
            'latitude.numeric' => 'الخط العرضي يجب أن يكون رقمًا.',
            'longitude.numeric' => 'الخط الطولي يجب أن يكون رقمًا.',
        ];
    }
}
