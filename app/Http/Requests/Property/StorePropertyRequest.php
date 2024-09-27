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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'property_type_id' => 'required|exists:property_types,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'area' => 'required|numeric|min:0',
            'bedroom' => 'required|integer|min:0',
            'bathroom' => 'required|integer|min:0',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'attributes' => 'required|array',
            'attributes.*' => 'exists:attributes,id',
            'benefits' => 'required|array',
            'benefits.*' => 'exists:benefits,id',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string|in:available,sold,rented',
            'discount-amount' => 'nullable|numeric|min:0',
            'installment-amount' => 'nullable|numeric|min:0',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'country' => 'required|string|max:255',
            'governorate' => 'required|string|max:255',
            'street' => 'required|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
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
            'area.required' => 'مساحة العقار مطلوبة.',
            'area.numeric' => 'مساحة العقار يجب أن تكون رقمًا.',
            'area.min' => 'مساحة العقار يجب أن تكون 0 أو أكثر.',
            'bedroom.required' => 'عدد غرف النوم مطلوب.',
            'bedroom.integer' => 'عدد غرف النوم يجب أن يكون رقمًا صحيحًا.',
            'bedroom.min' => 'عدد غرف النوم يجب أن يكون 0 أو أكثر.',
            'bathroom.required' => 'عدد الحمامات مطلوب.',
            'bathroom.integer' => 'عدد الحمامات يجب أن يكون رقمًا صحيحًا.',
            'bathroom.min' => 'عدد الحمامات يجب أن يكون 0 أو أكثر.',
            'address.required' => 'عنوان العقار مطلوب.',
            'address.max' => 'عنوان العقار يجب ألا يتجاوز 255 حرفًا.',
            'city.required' => 'المدينة مطلوبة.',
            'city.max' => 'اسم المدينة يجب ألا يتجاوز 255 حرفًا.',
            'state.required' => 'الولاية/المحافظة مطلوبة.',
            'state.max' => 'اسم الولاية/المحافظة يجب ألا يتجاوز 255 حرفًا.',
            'zip_code.required' => 'الرمز البريدي مطلوب.',
            'zip_code.max' => 'الرمز البريدي يجب ألا يتجاوز 20 حرفًا.',
            'attributes.required' => 'سمات العقار مطلوبة.',
            'attributes.array' => 'سمات العقار يجب أن تكون مصفوفة.',
            'attributes.*.exists' => 'إحدى سمات العقار المحددة غير صالحة.',
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
            'discount-amount.numeric' => 'مبلغ الخصم يجب أن يكون رقمًا.',
            'discount-amount.min' => 'مبلغ الخصم يجب أن يكون 0 أو أكثر.',
            'installment-amount.numeric' => 'مبلغ القسط يجب أن يكون رقمًا.',
            'installment-amount.min' => 'مبلغ القسط يجب أن يكون 0 أو أكثر.',
            'latitude.numeric' => 'الخط العرضي يجب أن يكون رقمًا.',
            'longitude.numeric' => 'الخط الطولي يجب أن يكون رقمًا.',
            'country.required' => 'البلد مطلوبة.',
            'country.max' => 'اسم البلد يجب ألا يتجاوز 255 حرفًا.',
            'governorate.required' => 'المحافظة مطلوبة.',
            'governorate.max' => 'اسم المحافظة يجب ألا يتجاوز 255 حرفًا.',
            'street.required' => 'الشارع مطلوب.',
            'street.max' => 'اسم الشارع يجب ألا يتجاوز 255 حرفًا.',
        ];
    }
}
