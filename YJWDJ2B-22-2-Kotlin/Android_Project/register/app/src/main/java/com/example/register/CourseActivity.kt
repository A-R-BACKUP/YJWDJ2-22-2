package com.example.register

import android.app.Activity
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.content.Intent
import android.net.Uri
import android.os.Parcelable
import androidx.activity.result.contract.ActivityResultContracts
import com.example.register.databinding.ActivityCourseBinding
import java.net.URL

class CourseActivity : AppCompatActivity() {
    private var name:String? = null
    private var course:String? = null

    private val binding by lazy { ActivityCourseBinding.inflate(layoutInflater) }

    private val requestPhoto =
        registerForActivityResult(ActivityResultContracts.GetContent()){
            binding.imageViewPhoto.setImageURI(it)
        }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)

        setResult(Activity.RESULT_CANCELED)

        with(intent){
            name = getStringExtra("name")
            name?.let { binding.textViewName.text = it }
            course = getStringExtra("course")
            course?.let { binding.textViewCourse.text = it }
        }

        binding.buttonCancel.setOnClickListener { finish() }
        binding.buttonComfirm.setOnClickListener {
            setResult(Activity.RESULT_OK)
            finish()
        }
        binding.buttonPhoto.setOnClickListener{
            requestPhoto.launch("image/*")
        }

        if(intent.type?.startsWith("image/")==true) {
            (intent.getParcelableExtra<Parcelable>(Intent.EXTRA_STREAM) as? Uri)?.let {
                binding.imageViewPhoto.setImageURI(it)
            }
        }
    }
}